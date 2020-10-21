<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{

    /**
     * The table type.
     *
     * @var string
     */
    public $type;

    /**
     * The table name.
     *
     * @var string
     */
    public $name;

    /**
     * The table tableData.
     *
     * @var array
     */
    public $tableData;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $name
     * @param array $tableData
     * @return void
     */
    public function __construct($type, $name, $tableData)
    {
        $this->type = $type;
        $this->name = $name;
        $this->tableData = $tableData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table');
    }
}
