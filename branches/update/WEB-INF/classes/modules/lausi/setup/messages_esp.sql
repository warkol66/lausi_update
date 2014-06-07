DELETE FROM `actionLogs_label` WHERE `action` LIKE 'Lausi%' AND `language` = 'esp';
OPTIMIZE TABLE `actionLogs_label`;
