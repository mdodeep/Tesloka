import ApexCharts from "apexcharts";
import Choices from "choices.js";
import "choices.js/public/assets/styles/choices.min.css";
import "preline";
import { createIcons, icons } from "lucide";
import { CbtApp, CbtLayout } from "./tailwick.js";
import Quill from "quill";
import "quill/dist/quill.snow.css";

window.ApexCharts = ApexCharts;
window.Choices = Choices;
window.Quill = Quill;
window.lucide = {
    createIcons: (options = {}) => createIcons({ icons, ...options }),
    icons,
};
window.createIcons = (options = {}) => createIcons({ icons, ...options });

document.addEventListener("DOMContentLoaded", () => {
    createIcons({ icons });
    new CbtApp().init();
    new CbtLayout().init();

    // Native Instant Table Filter (Zero-Dependency & Fast)
    document.addEventListener("input", (e) => {
        const input = e.target.closest("[data-table-filter]");
        if (!input) return;
        const targetSelector = input.getAttribute("data-table-filter");
        const table = document.querySelector(targetSelector);
        if (!table) return;
        const tbody = table.querySelector("tbody");
        if (!tbody) return;
        const query = input.value.toLowerCase().trim();
        const rows = tbody.querySelectorAll("tr:not(.no-filter)");
        rows.forEach((row) => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? "" : "none";
        });
    });
});

// Register Service Worker for Offline Resilience
if (
    "serviceWorker" in navigator &&
    window.location.protocol.startsWith("http")
) {
    window.addEventListener("load", () => {
        navigator.serviceWorker.register("/sw.js").catch(() => {});
    });
}

// CBT Browser Image Compression & Conversion (FULL-FEATURE 5.8)
/**
 * Konversi dan kompresi gambar ke WebP (kualitas 60% / 0.60) langsung di browser sebelum pengunggahan.
 * Menggunakan Web APIs native: createImageBitmap (orientasi EXIF otomatis), Canvas, dan toBlob.
 *
 * @param {File} file Berkas gambar asli
 * @param {number} quality Parameter kualitas WebP (default 0.60 = 60%)
 * @returns {Promise<{file: File, originalSize: number, compressedSize: number, ratio: number, isConverted: boolean}>}
 */
window.compressImageToWebP = async function (file, quality = 0.60, maxDimension = 1600) {
    if (!file || !file.type || !file.type.startsWith("image/")) {
        return { file, originalSize: file ? file.size : 0, compressedSize: file ? file.size : 0, ratio: 0, isConverted: false };
    }

    // Hindari re-kompresi berkas vektor SVG atau animasi GIF
    if (file.type === "image/svg+xml" || file.type === "image/gif") {
        return { file, originalSize: file.size, compressedSize: file.size, ratio: 0, isConverted: false };
    }

    try {
        let bitmap;
        try {
            bitmap = await createImageBitmap(file, { imageOrientation: "from-image" });
        } catch {
            bitmap = await createImageBitmap(file);
        }

        let targetWidth = bitmap.width;
        let targetHeight = bitmap.height;
        if (maxDimension > 0 && (targetWidth > maxDimension || targetHeight > maxDimension)) {
            const scale = maxDimension / Math.max(targetWidth, targetHeight);
            targetWidth = Math.max(1, Math.round(targetWidth * scale));
            targetHeight = Math.max(1, Math.round(targetHeight * scale));
        }

        const canvas = document.createElement("canvas");
        canvas.width = targetWidth;
        canvas.height = targetHeight;

        const ctx = canvas.getContext("2d", { alpha: true });
        if (!ctx) {
            if (typeof bitmap.close === "function") bitmap.close();
            return { file, originalSize: file.size, compressedSize: file.size, ratio: 0, isConverted: false };
        }

        ctx.drawImage(bitmap, 0, 0, targetWidth, targetHeight);
        if (typeof bitmap.close === "function") bitmap.close();

        const blob = await new Promise((resolve) => {
            canvas.toBlob(resolve, "image/webp", quality);
        });

        if (!blob || blob.size === 0) {
            return { file, originalSize: file.size, compressedSize: file.size, ratio: 0, isConverted: false };
        }

        // Jangan ganti berkas asli jika hasil re-encode WebP malah lebih besar
        if (blob.size >= file.size && ["image/jpeg", "image/png", "image/webp"].includes(file.type)) {
            return { file, originalSize: file.size, compressedSize: file.size, ratio: 0, isConverted: false };
        }

        // Pastikan nama berkas baru berakhiran .webp
        const baseName = file.name.replace(/\.[^/.]+$/, "") || "image";
        const newFileName = `${baseName}.webp`;

        const convertedFile = new File([blob], newFileName, {
            type: "image/webp",
            lastModified: Date.now()
        });

        const ratio = Math.max(0, Math.round(((file.size - convertedFile.size) / file.size) * 100));

        return {
            file: convertedFile,
            originalSize: file.size,
            compressedSize: convertedFile.size,
            ratio,
            isConverted: true
        };
    } catch (err) {
        console.warn("Kompresi WebP client-side gagal, menggunakan berkas asli:", err);
        return { file, originalSize: file.size, compressedSize: file.size, ratio: 0, isConverted: false };
    }
};

// CBT Dropzone Handlers
window.handleDropzoneChange = async function (input, previewId) {
    if (!input.files || !input.files[0]) return;
    let file = input.files[0];
    const inputId = input.id;
    const dropzoneBox = document.getElementById("dropzone_box_" + inputId);
    const currentEl = document.getElementById("current_" + inputId);
    const previewEl = document.getElementById(previewId);
    const convertingEl = document.getElementById("converting_" + inputId);
    const filenameEl = document.getElementById("filename_" + inputId);
    const badgeWebpEl = document.getElementById("badge_webp_" + inputId);
    const filesizeEl = document.getElementById("filesize_" + inputId);
    const savingsTagEl = document.getElementById("savings_tag_" + inputId);
    const thumbImg = document.getElementById("thumb_img_" + inputId);
    const thumbIcon = document.getElementById("thumb_icon_" + inputId);

    // Sembunyikan dropzone prompt dan current file, tampilkan preview card bersih
    if (dropzoneBox) dropzoneBox.classList.add("hidden");
    if (currentEl) currentEl.classList.add("hidden");
    if (previewEl) previewEl.classList.remove("hidden");

    if (filenameEl) filenameEl.textContent = file.name;
    if (badgeWebpEl) badgeWebpEl.classList.add("hidden");
    if (savingsTagEl) savingsTagEl.classList.add("hidden");

    const kb = (file.size / 1024).toFixed(1);
    if (filesizeEl) {
        filesizeEl.textContent = kb > 1024 ? (kb / 1024).toFixed(2) + " MB" : kb + " KB";
    }

    // Otomatis konversi setiap gambar ke WebP (Kualitas 60%) di browser
    if (file.type.startsWith("image/") && file.type !== "image/svg+xml" && !file._alreadyCompressed) {
        if (convertingEl) convertingEl.classList.remove("hidden");

        const compResult = await window.compressImageToWebP(file, 0.60);
        if (convertingEl) convertingEl.classList.add("hidden");

        if (compResult.isConverted) {
            compResult.file._alreadyCompressed = true;
            file = compResult.file;

            // Masukkan berkas WebP hasil kompresi ke input elemen form via DataTransfer
            try {
                const dt = new DataTransfer();
                dt.items.add(file);
                input.files = dt.files;
            } catch (e) {
                console.warn("DataTransfer update gagal:", e);
            }

            if (filenameEl) {
                filenameEl.textContent = file.name;
                filenameEl.title = file.name;
            }

            if (badgeWebpEl) {
                badgeWebpEl.classList.remove("hidden");
            }

            const origKb = (compResult.originalSize / 1024).toFixed(1);
            const compKb = (compResult.compressedSize / 1024).toFixed(1);

            if (filesizeEl) {
                filesizeEl.textContent = compKb + " KB";
            }

            if (savingsTagEl) {
                savingsTagEl.textContent = `Hemat ${compResult.ratio}% (dari ${origKb} KB)`;
                savingsTagEl.classList.remove("hidden");
            }
        }
    }

    if (file.type.startsWith("image/") && thumbImg && thumbIcon) {
        const reader = new FileReader();
        reader.onload = function (e) {
            thumbImg.src = e.target.result;
            thumbImg.classList.remove("hidden");
            thumbIcon.classList.add("hidden");
        };
        reader.readAsDataURL(file);
    } else if (thumbImg && thumbIcon) {
        thumbImg.classList.add("hidden");
        thumbIcon.classList.remove("hidden");
    }
};

window.handleDropzoneDrop = function (event, inputId) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const dt = event.dataTransfer;
    if (dt && dt.files && dt.files.length) {
        input.files = dt.files;
        window.handleDropzoneChange(input, "preview_" + inputId);
    }
};

window.resetDropzone = function (inputId, previewId, currentId) {
    const input = document.getElementById(inputId);
    if (input) input.value = "";
    const dropzoneBox = document.getElementById("dropzone_box_" + inputId);
    const currentEl = currentId ? document.getElementById(currentId) : null;
    const previewEl = document.getElementById(previewId);

    if (previewEl) previewEl.classList.add("hidden");
    if (currentEl) {
        currentEl.classList.remove("hidden");
    } else if (dropzoneBox) {
        dropzoneBox.classList.remove("hidden");
    }
};

// Deteksi Telemetri Perangkat (PC Desktop, Laptop, HP, Tablet, Lainnya)
window.collectDeviceTelemetry = async function () {
    const info = {
        user_agent: navigator.userAgent || "",
        platform: navigator.platform || "",
        screen_width: window.screen ? window.screen.width : window.innerWidth,
        screen_height: window.screen ? window.screen.height : window.innerHeight,
        viewport_width: window.innerWidth || 0,
        viewport_height: window.innerHeight || 0,
        pixel_ratio: window.devicePixelRatio || 1,
        max_touch_points: navigator.maxTouchPoints || 0,
        pointer_coarse: Boolean(window.matchMedia && window.matchMedia("(pointer: coarse)").matches),
        pointer_fine: Boolean(window.matchMedia && window.matchMedia("(pointer: fine)").matches),
        has_battery: false,
        battery_charging: null,
        battery_level: null,
        battery_discharging_finite: false
    };

    if (typeof navigator.getBattery === "function") {
        try {
            const battery = await navigator.getBattery();
            if (battery) {
                info.has_battery = true;
                info.battery_charging = Boolean(battery.charging);
                info.battery_level = typeof battery.level === "number" ? Number(battery.level.toFixed(2)) : null;
                info.battery_discharging_finite = Number.isFinite(battery.dischargingTime) && battery.dischargingTime > 0 && battery.dischargingTime < Infinity;
            }
        } catch {
            // Abaikan bila Browser memblokir Battery API
        }
    }

    return info;
};

document.addEventListener("DOMContentLoaded", async () => {
    const inputs = document.querySelectorAll('input[name="device_telemetry"]');
    if (inputs.length > 0 && typeof window.collectDeviceTelemetry === "function") {
        const telemetry = await window.collectDeviceTelemetry();
        const serialized = JSON.stringify(telemetry);
        inputs.forEach((el) => {
            el.value = serialized;
        });
    }
});
