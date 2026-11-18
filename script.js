const toggle = document.querySelector(".menu-toggle");
const nav = document.querySelector(".nav");

toggle?.addEventListener("click", () => {
  const open = nav.classList.toggle("open");
  toggle.setAttribute("aria-expanded", String(open));
});

document.querySelectorAll(".nav a").forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.remove("open");
    toggle?.setAttribute("aria-expanded", "false");
  });
});

const form = document.querySelector("#reservationForm");
form?.addEventListener("submit", async (event) => {
  event.preventEvent?.();
  event.preventDefault();
  const status = form.querySelector(".form-status");
  status.textContent = "Enviando solicitação...";

  try {
    const response = await fetch(form.action, { method: "POST", body: new FormData(form) });
    const result = await response.json();
    status.textContent = result.message;
    if (result.success) form.reset();
  } catch {
    status.textContent = "Não foi possível enviar agora. Ligue para (98) 3181-8362.";
  }
});

const dateInput = document.querySelector('input[name="data"]');
if (dateInput) dateInput.min = new Date().toISOString().split("T")[0];
