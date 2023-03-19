function validateForm() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked')
    if (checkboxes.length > 2) {
        alert('Вы выбрали больше двух подарков!')
        return false
    } else if (checkboxes.length === 0) {
        alert('Вы не выбрали ни одного подарка!')
        return false
    }
    return true
}