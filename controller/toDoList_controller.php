<?php

function deleteToDo($id)
{

    foreach ($_SESSION['todoList'] as $key => $toDo) {
        if ($toDo['id'] == $id) {
            unset($_SESSION['todoList'][$key]);
            return true;
        }
    }
    return false;
}

function getToDoId()
//retorna el nombre d'usuaris
{
    $toDoList = $_SESSION['todoList'];
    $lastToDo = end($toDoList);
    return $lastToDo['id'] + 1;
}

function getToDoBgColor($toDo)
//Retorna el color de fons de la card del toDo
{
        switch ($toDo['priority']) {
            case 0:
                //colro verd
                $bgColor = "bg-success-subtle";
                break;
            case 1:
                //colro groc
                $bgColor = "bg-warning-subtle";
                break;
            case 2:
                //color vermell
                $bgColor = "bg-danger-subtle";
                break;
            default:
                $bgColor = "";
                break;
        }
        return $bgColor;

}
