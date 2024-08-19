console.log("forms-script.js");

let dataEditButtons = document.getElementsByClassName("display_form");
console.log("dataEditButtons => ", dataEditButtons );
for(let dataEditButton of dataEditButtons){
    dataEditButton.addEventListener('click', hideDataAndDisplayForm);
}

function hideDataAndDisplayForm(event){
    event.preventDefault();
    //au clic, rechercher le parent qui porte la classe 'editable_data'
    let editableDataContainer = event.target.closest(".editable-data_container");
    console.log("editableDataContainer => ", editableDataContainer );

    let editableData = editableDataContainer.getElementsByClassName("editable-data")[0];
    console.log("editableData => ", editableData);
    let editDataForm = editableDataContainer.getElementsByClassName("hide")[0];
    editableData.classList.add("hide");
    editDataForm.classList.remove("hide");
}
