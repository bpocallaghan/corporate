<?php

namespace Bpocallaghan\Corporate\Controllers\Website;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bpocallaghan\Corporate\Models\Tender;
use Bpocallaghan\Corporate\Models\Vacancy;
use Bpocallaghan\Corporate\Models\AnnualReport;
use App\Http\Controllers\Website\WebsiteController;

class CorporateController extends WebsiteController
{
    public function tenders()
    {
        $items = Tender::active()->orderBy('active_from', 'DESC')->get();

        return $this->view('corporate::tenders')->with('items', $items);
    }

    public function downloadTender(Tender $tender)
    {
        $tender->increment('total_downloads');

        return json_response();
    }

    public function vacancies()
    {
        $items = Vacancy::active()->orderBy('active_from', 'DESC')->get();

        return $this->view('corporate::vacancies')->with('items', $items);
    }

    public function downloadVacancy(Vacancy $vacancy)
    {
        $vacancy->increment('total_downloads');

        return json_response();
    }

    public function annualReports()
    {
        $items = AnnualReport::active()->orderBy('active_from', 'DESC')->get();

        return $this->view('corporate::annual_reports')->with('items', $items);
    }

    public function downloadAnnualReport(AnnualReport $annual_report)
    {
        $annual_report->increment('total_downloads');

        return json_response();
    }
}