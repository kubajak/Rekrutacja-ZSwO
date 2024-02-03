/**
 * @param {String} url 
 */
function confirmDelete(url) {
    if (confirm("Czy na pewno chcesz usunąć ten rekord?")) {
        window.location.href = url
    }
}