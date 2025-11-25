document.addEventListener("DOMContentLoaded", () => {
  const editButtons = document.querySelectorAll('.edit-btn');
  const modal = document.getElementById('editModal');
  const cancelBtn = document.getElementById('cancelEdit');
  const modalContent = document.getElementById('modalContent');

  const idInput = document.getElementById('edit_id');
  const nameInput = document.getElementById('edit_name');
  const typeInput = document.getElementById('edit_type');
  const descInput = document.getElementById('edit_description');
  const priceNormalInput = document.getElementById('edit_price_normal');
  const priceLargeInput = document.getElementById('edit_price_large');

  editButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();

      const row = btn.closest('tr');
      const cells = row.querySelectorAll('td');

      idInput.value = cells[0].innerText.trim();
      nameInput.value = cells[1].innerText.trim();
      typeInput.value = cells[2].innerText.trim();
      descInput.value = cells[3].innerText.trim();
      priceNormalInput.value = cells[4].innerText.replace('€','').trim();
      priceLargeInput.value = cells[5].innerText.replace('€','').trim();

      modal.classList.remove('hidden');
      modalContent.classList.remove('scale-95');
      modalContent.classList.add('scale-100');
    });
  });

  cancelBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
  });

  // Modalın dışına tıklayınca kapat
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.add('hidden');
    }
  });
});
