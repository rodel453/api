<?php

namespace App\Http\Controllers;
use Spatie\Analytics\Period;
use Analytics;
use Illuminate\Http\Request;

// $startDate = Carbon::now()->subYear();
//     $endDate = Carbon::now();

//     Period::create($startDate, $endDate);

class AnalyticsController extends Controller
{
    //

    public function visitorpageview(){

        //retrieve visitors and pageview data for the current day and the last seven days
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        //retrieve visitors and pageviews since the 6 months ago
        return $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );

    }

    public function fetchVisitorsAndPageViews(Period $period){
        
        return 'Collection';
    }

    public function fetchTotalVisitorsAndPageViews(Period $period){


    }

    public function fetchTopReferrers(Period $period, int $maxResults = 20){
        

    }

    public function fetchUserTypes(Period $period){


    }

    public function fetchTopBrowsers(Period $period, int $maxResults = 10){


    }

    public function performQuery(Period $period, string $metrics, array $others = []){

    }

}
