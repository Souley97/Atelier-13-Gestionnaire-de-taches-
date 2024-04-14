<?php 

$badgeClass = '';
switch ($tache['priority']) {
    case 'low':
        $badgeClass = 'bg-success';
        break;
    case 'medium':
        $badgeClass = 'bg-warning';
        break;
    case 'high':
        $badgeClass = 'bg-danger';
        break;
    default:
        $badgeClass = 'bg-secondary'; // Par défaut
        break;
}
?>