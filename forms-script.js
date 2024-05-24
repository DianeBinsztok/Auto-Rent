let dataEditButtons = document.getElementsByClassName("display_form");

for(let dataEditButton of dataEditButtons){
    dataEditButton.addEventListener('click', hideDataAndDisplayForm);
}

function hideDataAndDisplayForm(event){
    event.preventDefault();
    //au clic, rechercher le parent qui porte la classe 'editable_data'
    let editableDataContainer = event.target.closest(".editable-data_container");

    let editableData = editableDataContainer.getElementsByClassName("editable-data")[0];
    let editDataForm = editableDataContainer.getElementsByClassName("hidden")[0];
    editableData.classList.add("hidden");
    editDataForm.classList.remove("hidden");
}