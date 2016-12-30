<?php

namespace App\Libraries;

use \Illuminate\Pagination\BootstrapThreePresenter;

class ZuiThreePresenter extends BootstrapThreePresenter
{
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pager pager-loose" style="display:inline-block;">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

    protected function getDisabledTextWrapper($text)
    {
        return '<li class="disabled"><span>'.$text.'</span></li>';
    }

    protected function getActivePageWrapper($text)
    {
        return '<li class="active"><a href="javascript:;">'.$text.'</a></li>';
    }

    protected function getDots()
    {
        return '<li><a href="javascript:;">&middot;&middot;&middot;</a></li>';
    }
}
