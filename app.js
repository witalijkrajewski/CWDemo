function validateCheckboxes() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked')
    if (checkboxes.length > 2) {
        alert('Вы выбрали больше двух подарков!')
        return false
    } else if (checkboxes.length === 0) {
        alert('Вы не выбрали ни одного подарка!')
        return false
    }

    const nameInput = document.querySelector("#name")
    if (nameInput.value.trim() === "") {
        nameInput.classList.add("error")
    }

    const birthDateInput = document.querySelector("#birthdate")
    if (birthDateInput.value.trim() === "") {
        birthDateInput.classList.add("error")
    }

    return true
}