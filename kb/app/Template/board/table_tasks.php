<!-- task row -->
<tr class="board-swimlane board-swimlane-tasks-<?= $swimlane['id'] ?>">
    <?php foreach ($swimlane['columns'] as $column): ?>
        <td class="
            board-column-<?= $column['id'] ?>
            <?= $column['task_limit'] > 0 && $column['column_nb_tasks'] > $column['task_limit'] ? 'board-task-list-limit' : '' ?>
            "
        >

            <!-- tasks list -->
            <div
                class="board-task-list board-column-expanded <?= $this->projectRole->isSortableColumn($column['project_id'], $column['id']) ? 'sortable-column' : '' ?>"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">

		<!-- sort column by date. column id: 77. project id: 18 -->
                <?php  
                    
                    $sorted = [];
                    $min=0;
                    //  
                    if($column['project_id'] == "18" && $column['id']==77){
                        usort($column['tasks'], function($a, $b) { // anonymous function
                            // compare numbers only
                            return $a['date_started'] - $b['date_started'];
                        });
                    }
                ?>
                <!--  -->


                <?php foreach ($column['tasks'] as $task): ?>
                    <?= $this->render($not_editable ? 'board/task_public' : 'board/task_private', array(
                        'project' => $project,
                        'task' => $task,
                        'board_highlight_period' => $board_highlight_period,
                        'not_editable' => $not_editable,
                    )) ?>
                <?php endforeach ?>
            </div>

            <!-- column in collapsed mode (rotated text) -->
            <div class="board-column-collapsed board-task-list sortable-column"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">
                <div class="board-rotation-wrapper">
                    <div class="board-column-title board-rotation board-toggle-column-view" data-column-id="<?= $column['id'] ?>" title="<?= t('Show this column') ?>">
                        <i class="fa fa-plus-square" title="<?= $this->text->e($column['title']) ?>"></i> <?= $this->text->e($column['title']) ?>
                    </div>
                </div>
            </div>
        </td>
    <?php endforeach ?>
</tr>