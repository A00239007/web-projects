

var rootURLFighters = "http://localhost/TekkenApp/api/fighters";
var rootURLUsers = "http://localhost/TekkenApp/api/users";
var deleteURLFighters = "http://localhost/TekkenApp/api/fighters/";


var renderListFighters = function(data)
{
    var totalFemaleCount = 0;
    var totalMaleCount = 0;
    var unknownAges = 0;
    list=data.fighters;
    console.log('list fighters');
    $.each(list, function(index, fighter)
    {
        if(fighter.gender==='F')
        {
            totalFemaleCount++;
        }
        else if(fighter.gender==='M')
        {
            totalMaleCount++;
        }
        
        if(fighter.age==='Unknown')
        {
            unknownAges++;
        }
        $('#table_body_fighters').append("<tr>\n\
            <td>"+fighter.name+"</td>\n\
            <td>"+fighter.play_style+"</td>\n\
            <td>"+fighter.age+"</td>\n\
            <td><input type='button' value='Edit' onClick='getFighterById("+fighter.id+")'/></td>\n\
            <td><input type='button' value='Delete' onClick='deleteFighter("+fighter.id+")'/></td>\n\
            </tr>");
    });
    $('#table_id_fighters').DataTable();
    updateCards(list.length,totalMaleCount,totalFemaleCount,unknownAges);
};

function updateCards(total, totalMale, totalFemale, totalUnknownAges)
{
    $('#total_number_fighters').text(total);
    $('#total_number_fighters_female').text(totalFemale);
    $('#total_number_fighters_male').text(totalMale);
    $('#unknown_ages').text(totalUnknownAges);
}
var renderListUsers = function(data)
{
    list=data.users;
    console.log('list users');
    $.each(list, function(index, user)
    {
        $('#table_body_users').append('<tr><td>'+user.name+'</td><td>'+user.email+'</td></tr>');
    });
    $('#table_id_users').DataTable();
};

function deleteFighter(id, name)
{
    $.ajax({
        type: 'DELETE',
        url: deleteURLFighters+id,
        success: function(data, textStatus, jqXHR)
        {
            alert("Fighter deleted successfully");
            findAllFighters();
        }
    });
}

function createFighter()
{
    $.ajax({
        type:'POST',
        contentType: 'application/json',
        url:rootURLFighters,
        dataType:"json",
        data: createFormToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Fighter created successfully');
            findAllFighters();
        },
        error: function(jqXHR, textStatus, errorThrown){
          alert('Add Fighter Error: '+textStatus);  
        }
    });
}

function getFighterById(id)
{
    $.ajax({
        type:'GET',
        contentType: 'application/json',
        url:rootURLFighters+'/'+id,
        dataType:"json",
        success: editFighterModal,
        error: function(jqXHR, textStatus, errorThrown){
          alert('Add Fighter Error: '+textStatus);  
        }
    });
}
function editFighter(id)
{
    $.ajax({
        type:'PUT',
        contentType: 'application/json',
        url:rootURLFighters+'/'+id,
        dataType:"json",
        data: editFormToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Fighter updated successfully');
            findAllFighters();
        },
        error: function(jqXHR, textStatus, errorThrown){
          alert('Add Fighter Error: '+textStatus);  
        }
    });
}

function findAllFighters()
{
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURLFighters,
        dataType: "json",
        success: renderListFighters
    });
};


function findAllUsers()
{
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURLUsers,
        dataType: "json",
        success: renderListUsers
    });
};

function createFormToJSON()
{
    var obj = {
        'id':$('#id').val(),
        'name':$('#name').val(),
        'play_style': $('#playStyle').val(),
        'age':$('#age').val(),
        'gender': $("input[name='gender']:checked").val(),
        'description':$('#description').val()
    };
    console.log(obj);
    return JSON.stringify(obj);
}

function editFormToJSON()
{
    var obj = {
        'id':$('#editId').val(),
        'name':$('#editName').val(),
        'play_style': $('#editPlayStyle').val(),
        'age':$('#editAge').val(),
        'gender': $("input[name='gender']:checked").val(),
        'description':$('#editDescription').val()
    };
    console.log(obj);
    return JSON.stringify(obj);
}
function verifyCheckBox(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}

function createFighterModal()
{
    $('#createFighter').modal('show');
}

function editFighterModal(data)
{
    console.log(data);
    console.log(data.id);
    $('#editId').val(data.id);
    $('#editName').val(data.name);
    $('#editPlayStyle').val(data.play_style);
    $('#editAge').val(data.age);
    if(data.gender==='M')
    {
        $('#editGenderMale').attr('checked', true);
    }
    else if(data.gender==='F')
    {
        $('#editGenderFemale').attr('checked', true);
    }
    $('#editDescription').val(data.description);
    $('#editFighter').modal('show');
}


$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  findAllFighters();
  findAllUsers();
});















