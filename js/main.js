let users;
let table = document.getElementById("table-body");

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
