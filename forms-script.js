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

    console.log(editableData);
    console.log(editDataForm);

    //let editableData = targetContainerChildren.find((child)=>child.hasClass("editable_data"));
    
    /*
    let editableData = targetContainerChildren.find("editable_data")[0];
    let editDataForm = targetContainerChildren.find("hidden")[0];
    console.log(editableData);
    console.log(editDataForm);
    */

    /*
    let editableData = targetContainer.closest(".editable-data");
    let editDataForm = targetContainer.closest(".hidden");
    */
}