(function () {
  const container = document.getElementById('toast-container');

  window.showToast = function (
    message,
    type = 'info',   // info | success | error
    duration = 4000  // auto close time
  ) {
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;

    toast.innerHTML = `
      <div class="toast-message">${message}</div>
      <button class="toast-close" aria-label="Close">&times;</button>
    `;

    // Close button
    toast.querySelector('.toast-close').addEventListener('click', () => {
      closeToast(toast);
    });

    container.appendChild(toast);

    // Auto dismiss
    if (duration > 0) {
      setTimeout(() => closeToast(toast), duration);
    }
  };

  function closeToast(toast) {
    toast.style.animation = 'fadeOut 0.25s ease-in forwards';
    toast.addEventListener('animationend', () => {
      toast.remove();
    });
  }
})();
