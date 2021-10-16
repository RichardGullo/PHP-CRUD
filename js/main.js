let users;
let table = document.getElementById("table-body");
let addButton = document.getElementById("add-button");
let addTextField = document.getElementById("add-inputField");
let currentIndex = 0;

function populateArray(){
    fetch('populate.php')
    .then(function(res){
        return res.json();
    })
    .then(function(data){
        console.log(data);
    
        users = data;
        let output = ``;
        for(let user of users)
        {
            output += `
            <tr>
                <td>${user.name}</td>
                <td class="crud-buttons">
                    <i class="fas fa-edit fa-lg" data-action="edit"></i>
                    <i class="fas fa-trash fa-lg" data-action="delete"></i>
                </td>
            </tr>
            
            `;
            
        }

        table.innerHTML = output;

    })
}

function handleClick(evt){
    let {action} = evt.target.dataset;

    if(action){
        if(action == "delete"){
            console.log("Delete");
            let rowIndex = evt.target.closest("tr").rowIndex;
            deleteEntry(rowIndex, evt.target.closest("tr"));    
        }

    }
}

function deleteEntry(index, currentRow){
    let id = users[index].id;
    users = users.filter((user) => user.id != id);
    let formData = new FormData();
    formData.append('delete-id', id);
    
    fetch("delete.php",{
        method:"POST",
        body:formData
    }).then(function(res){
        return res.text();
    }).then(function(data){
        console.log(data);
        currentRow.remove();
    })
    
}


addButton.addEventListener("click",(e)=>{
    
    e.preventDefault();
    let formData = new FormData();
    formData.append('test',addTextField.value);

    fetch('insert.php',{
        method:"POST",
        body:formData
    }).then(function(res){
        return res.json();
    }).then(function(data){
        console.log(data);
        users.push({name:data.name, id:data.id});
        let output = `
                        <td>${data.name}</td>
                        <td class="crud-buttons">
                            <i class="fas fa-edit fa-lg" data-action="edit"></i>
                            <i class="fas fa-trash fa-lg" data-action="delete"></i>
                        </td>
                    `;
        let tr = document.createElement("tr");
        tr.innerHTML = output;
        table.appendChild(tr);

    })
})

document.addEventListener("click", handleClick)




populateArray();