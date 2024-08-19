document.addEventListener('DOMContentLoaded', function() {

    // I - FILTRAGE PAR LOCATAIRE
    let tenantFilter = document.getElementById("tenant-filter");
    tenantFilter.addEventListener("change",(event) => {
        filters.tenant.active = true; 
        filters.tenant.value = event.target.value;
        checkAllSheets();
    });

    // II - FILTRAGE PAR DATE
    let dateFilter = document.getElementById("date-filter");
    dateFilter.addEventListener("change",(event) => {
        filters.date.active = true; 
        filters.date.value = event.target.value; 
        checkAllSheets();
    });

    // III - REMISE À ZÉRO
    let clearButton = document.getElementById("clear-filters");
    clearButton.addEventListener("click", ()=>{
    filters.date.active = false;
    filters.date.value = "";
    filters.tenant.active = false;
    filters.tenant.value = "";
    tenantFilter.value = "";
    dateFilter.value = "";
    checkAllSheets();

    });

});

let filters = {
    "date" : {"active":false, "value":""},
    "tenant":{"active":false, "value":""},
};

function checkAllSheets(){
    let sheets = document.getElementsByClassName("sheet_card");     
    for(let sheet of sheets){
        if(matchesAtLeastOneFilter(sheet)){
            setVisibility(sheet, true);
        }else{
            setVisibility(sheet, false);
        }
    }
}

function matchesAtLeastOneFilter(sheet){
    if(filters.date.active || filters.tenant.active){
        if((filters.date.active  && matchesDateCriteria(sheet, filters.date.value))||
        (filters.tenant.active  && matchesTenantCriteria(sheet, filters.tenant.value))){
            return true;
        }else{
            return false;
        }
    }else{
        return true;
    }
}

// Afficher/cacher une feuille
function setVisibility(target, visibility){
    if(visibility === true){
        target.classList.remove('hide');
    }else{
        target.classList.add('hide');
    }
}


function matchesDateCriteria(sheet, dateCriteria) {
    // Pour chaque sheet, récupérer les classes
    let classes = sheet.classList;

    for (let individualClass of classes) {
        if (individualClass.includes("date-")) {
            let date = individualClass.replace("date-", "").substring(0, 7);

            // Comparer la classe de date avec le critère
            if (date === dateCriteria.substring(0, 7)) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}

function matchesTenantCriteria(sheet, tenantCriteria) {
    // Pour chaque sheet, récupérer les classes
    let classes = sheet.classList;

    for (let individualClass of classes) {
        if (individualClass.includes("tenant-")) {
            let tenantId = individualClass.replace("tenant-", "");

            // Comparer la classe de tenant avec le critère
            if (parseInt(tenantId, 10) === parseInt(tenantCriteria, 10)) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}
        
