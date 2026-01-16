<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchResultComponent extends Component
{
    public $searchResults;
    public $user;
    public $options;

    public function __construct($searchResults = null, $user = null, $options = null)
    {
        $this->searchResults = $searchResults;
        $this->user = $user;
        $this->options = $options;
    }

    public function render(): View|Closure|string
    {
        return view('components.search-result-component');
    }
}
