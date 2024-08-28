/**
 * @param {string} url 
 * @param {string} id 
 */

function confirmDelete(url, id) {
    var escapedId = $('<div/>').text(id).html();
    var dialogContent = `<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
    Usunięcie tego rekordu jest nieodwracalne! </br><span style="font-size:36px;">ID: ${escapedId}</span></p>`;

    $("#dialog-confirm").html(dialogContent).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Usuń rekord": function () {
                window.location.href = url; // Przekierowanie do URL
                $(this).dialog("close");
            },
            "Anuluj": function () {
                $(this).dialog("close");
            }
        }
    });
}