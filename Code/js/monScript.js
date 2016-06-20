function addOption(idEntree,idListSortie){
        var option = document.createElement("option");
        option.text = document.getElementById(idEntree).value;
        var select = document.getElementById(idListSortie);
        select.appendChild(option);
        document.getElementById(idEntree).value='';
    }

    function delOption(idList){
        var select = document.getElementById(idList);
        select.remove(select.selectedIndex);
    }

function addOptionFromList(idListEntree,idListSortie){
    var selectEntree = document.getElementById(idListEntree);
    //alert(selectEntree.value);

    var option = document.createElement("option");

    
    option.text = selectEntree.options[selectEntree.selectedIndex].text;
    option.value= selectEntree.value;
    
    var selectSortie = document.getElementById(idListSortie);
    selectSortie.appendChild(option);
    
    selectEntree.remove(selectEntree.selectedIndex);
}

function selectOnChange(idSelect,idInput)
{
     document.getElementById(idInput).value = document.getElementById(idSelect).value;
}
function selectOnChangeIshi(idSelect,idInput)
{
	var select = document.getElementById(idSelect);
     document.getElementById(idInput).value = select.options[select.selectedIndex].text;
}

function envoiForm()
{
    //alert(1);
    $('form').submit();
}

function majInputType(type)
{
    document.getElementById('inputTypeAction').value=type; 
}