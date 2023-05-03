<?php
namespace App\Support\Csp\Policies;
 
use Spatie\Csp\Policies\Basic;
use Spatie\Csp\Directive;
 
class CustomPolicy extends Basic
{
    public function configure()
    {
        parent::configure();
 
        $this->addDirective(Directive::SCRIPT, ["https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"])
        ->addDirective(Directive::SCRIPT, ["https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"])
        ->addDirective(Directive::STYLE, ["https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"])
        ->addDirective(Directive::SCRIPT, ["https://code.jquery.com/jquery-3.6.3.js"])
        ->addDirective(Directive::STYLE, ["https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"])
        ->addDirective(Directive::STYLE, ["https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"])
        ->addDirective(Directive::STYLE, ["https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"])
        ->addDirective(Directive::STYLE, ["https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"])
        ->addDirective(Directive::STYLE, ["https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"])
        ->addDirective(Directive::STYLE, ["https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"])
        ->addDirective(Directive::SCRIPT, ["https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"])
        ->addDirective(Directive::SCRIPT, ["https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"])
        ->addDirective(Directive::SCRIPT, ["https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"])
        ->addDirective(Directive::SCRIPT, ["https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"])
        ->addDirective(Directive::SCRIPT, ["https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"])
        ->addDirective(Directive::SCRIPT, ["https://code.jquery.com/jquery-3.6.3.js"])
        ->addDirective(Directive::SCRIPT, ["https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js "])
            ->addDirective(Directive::STYLE, ["https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"])
            ->addDirective(Directive::IMG, 'https://laravel.com');
    }
}