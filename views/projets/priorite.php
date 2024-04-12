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
switch ($tache['status_name']) {
  case 'todo':
      $badgeStatu = 'bg-secondary';
      break;
  case 'in_progress':
      $badgeStatu = 'bg-warning';
      break;
  case 'completed':
      $badgeStatu = 'bg-success';
      break;
  default:
      $badgeStatu = 'bg-danger'; // Par défaut
      break;
}