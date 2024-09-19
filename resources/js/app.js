import './bootstrap';


function numericOnly(element) {
    const inputValue = element.value.replace(/\D/g, "");
    element.value = inputValue;
}
window.numericOnly = numericOnly;

function toggleButton(button) {
    const btn = document.querySelector(`#${button}`);
    if(btn){
        btn.toggleAttribute('disabled');
    }
}
window.toggleButton = toggleButton;

function teacherAction(action, teacher) {
    let config;

    if(action === 'Approve') {
        config = {
            title: action,
            icon: 'question',
            text: `Are you sure you want to ${action.toLowerCase()} this teacher?`,
            confirmButtonText: action,
            confirmButtonColor: '#198754',
            showCancelButton: true,
            allowOutsideClick: false,
            showLoaderOnConfirm: true,
            preConfirm: async (message) => {
                let csrfToken = document.head.querySelector('meta[name="csrf-token"]');
                try {
                    const url = `/verify-teacher`;
                    const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-Token': csrfToken.content,
                            },
                            body: JSON.stringify({id: teacher, action: action, message: message})
                    });
                    if (!response.ok) {
                        return Swal.showValidationMessage(`
                            ${JSON.stringify(await response.json())}
                        `);
                    }
                    return response.json();
                } catch (error) {
                    Swal.showValidationMessage(`
                        Request failed: ${error}
                    `);
                }
            },
        }
    } else {
        config = {
            title: action,
            icon: 'question',
            text: `Are you sure you want to ${action.toLowerCase()} this teacher?`,
            input: 'textarea',
            inputLabel: 'Please provide your reason for your action.',
            confirmButtonText: action,
            confirmButtonColor: '#dc3545',
            showCancelButton: true,
            allowOutsideClick: false,
            showLoaderOnConfirm: true,
            preConfirm: async (message) => {
                let csrfToken = document.head.querySelector('meta[name="csrf-token"]');
                try {
                    const url = `/verify-teacher`;
                    const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-Token': csrfToken.content,
                            },
                            body: JSON.stringify({id: teacher, action: action, message: message})
                    });
                    if (!response.ok) {
                        return Swal.showValidationMessage(`
                            ${JSON.stringify(await response.json())}
                        `);
                    }
                    return response.json();
                } catch (error) {
                    Swal.showValidationMessage(`
                        Request failed: ${error}
                    `);
                }
            },
        }
    }

    Swal.fire(config).then((result) => {
        if(result.isConfirmed) {
            if(result.value.success) {
                Swal.fire({
                    title: 'Success',
                    icon: 'success',
                    text:  result.value.message,
                    timer: 5000,
                });
            }
        }
    })
}
window.teacherAction = teacherAction;

(() => {
    "use strict";
  
    const storedTheme = localStorage.getItem("theme");
  
    const getPreferredTheme = () => {
        if (storedTheme) {
            return storedTheme;
        }
    
        return window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";
    };
  
    const setTheme = function (theme) {
        if (
            theme === "auto" &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        ) {
            document.documentElement.setAttribute("data-bs-theme", "dark");
        } else {
            document.documentElement.setAttribute("data-bs-theme", theme);
        }
    };
  
    setTheme(getPreferredTheme());
  
    const showActiveTheme = (theme, focus = false) => {
        const themeSwitcher = document.querySelector("#bd-theme");
    
        if (!themeSwitcher) {
            return;
        }
    
        const themeSwitcherText = document.querySelector("#bd-theme-text");
        const activeThemeIcon = document.querySelector(".theme-icon-active i");
        const btnToActive = document.querySelector(
            `[data-bs-theme-value="${theme}"]`
        );
        const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");
    
        for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
            element.classList.remove("active");
            element.setAttribute("aria-pressed", "false");
        }
    
        btnToActive.classList.add("active");
        btnToActive.setAttribute("aria-pressed", "true");
        activeThemeIcon.setAttribute("class", svgOfActiveBtn);
        const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
        themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);
    
        if (focus) {
            themeSwitcher.focus();
        }
    };
  
    window.matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", () => {
        if (storedTheme !== "light" || storedTheme !== "dark") {
            setTheme(getPreferredTheme());
        }
    });
  
    window.addEventListener("DOMContentLoaded", () => {
        showActiveTheme(getPreferredTheme());
    
        for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
            toggle.addEventListener("click", () => {
            const theme = toggle.getAttribute("data-bs-theme-value");
            localStorage.setItem("theme", theme);
            setTheme(theme);
            showActiveTheme(theme, true);
            });
        }
    });
})();