function addOption(idEntree,idListSortie){
        var option = document.createElement("option");
        option.text = document.getElementById(idEntree).value;
        var select = document.getElementById(idListSortie);
        select.appendChild(option);
    }

    function delOption(idList){
        var select = document.getElementById(idList);
        select.remove(select.selectedIndex);
    }