<?php

namespace App\Http\Livewire;

use App\Models\IssueBook;
use Livewire\Component;

class Report extends Component
{
    public $dateReport;
    public $monthReport;
    public $reports;
    public function mount()
    {
        $this->dateReport = date('Y-m-d');
        $this->monthReport = date('Y-m');
    }
    public function render()
    {
        return view('livewire.report')->layout('layout.app');
    }

    public function getDateReport()
    {
        $issueBook = IssueBook::whereDate('created_at', $this->dateReport)->orderBy('id', 'DESC')->get();
        $this->reports = $issueBook;
    }

    public function getMonthReport()
    {
        $issueBook = IssueBook::whereMonth('created_at', $this->monthReport)->orderBy('id', 'DESC')->get();
        $this->reports = $issueBook;
    }
}
