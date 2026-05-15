(function () {
  const form = document.getElementById('contactForm');
  if (!form) return;

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const firstName = form.firstName.value.trim();
    const lastName = form.lastName.value.trim();
    const email = form.email.value.trim();
    const message = form.message.value.trim();
    const statusEl = document.getElementById('formStatus');
    const submitBtn = form.querySelector('[type="submit"]');

    const errors = {};
    if (!firstName) errors.firstName = 'First name is required';
    if (!lastName) errors.lastName = 'Last name is required';
    if (!email) errors.email = 'Email is required';
    else if (!emailRegex.test(email)) errors.email = 'Please enter a valid email address';
    if (!message) errors.message = 'Message is required';
    else if (message.length < 10) errors.message = 'Message must be at least 10 characters long';

    form.querySelectorAll('.errorMessage').forEach(function (el) {
      el.textContent = '';
      el.hidden = true;
    });
    form.querySelectorAll('.input, .textarea').forEach(function (el) {
      el.classList.remove('inputError', 'textareaError');
    });

    Object.keys(errors).forEach(function (key) {
      const field = form[key];
      const errEl = document.getElementById('error-' + key);
      if (field) field.classList.add(key === 'message' ? 'textareaError' : 'inputError');
      if (errEl) {
        errEl.textContent = errors[key];
        errEl.hidden = false;
      }
    });

    if (Object.keys(errors).length) {
      if (statusEl) {
        statusEl.textContent = 'Please fill in all fields correctly.';
        statusEl.className = 'statusMessage errorMessageBox';
        statusEl.hidden = false;
      }
      return;
    }

    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    if (statusEl) statusEl.hidden = true;

    try {
      const response = await fetch('https://api.emailjs.com/api/v1.0/email/send', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          service_id: 'service_1jl8lce',
          template_id: 'template_i7v2j55',
          user_id: 'nnryAaeofzHiKdDWa',
          template_params: {
            firstName: firstName,
            lastName: lastName,
            email: email,
            message: message,
          },
        }),
      });

      if (!response.ok) throw new Error('Send failed');

      if (statusEl) {
        statusEl.textContent = 'Thank you! Your message has been sent successfully. We will get back to you soon.';
        statusEl.className = 'statusMessage successMessage';
        statusEl.hidden = false;
      }
      form.reset();
    } catch (err) {
      if (statusEl) {
        statusEl.textContent = 'Sorry, there was an error sending your message. Please try again later or contact us directly.';
        statusEl.className = 'statusMessage errorMessageBox';
        statusEl.hidden = false;
      }
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = 'Send Message';
    }
  });
})();
