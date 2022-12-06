<?php

namespace App\Http\Controllers;
use Spatie\Analytics\Period;
use Analytics;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

// $startDate = Carbon::now()->subYear();
//     $endDate = Carbon::now();

//     Period::create($startDate, $endDate);

class AnalyticsController extends Controller
{
    //

    public function __construct(Request $request){

        if(!empty($request->header('g_view_id'))){

            Config::set('analytics.view_id', $request->header('g_view_id'));
            Config::set('analytics.service_account_credentials_json', storage_path($request->header('website_file')));

        }

    }

    public function visitorpageview(Request $request){
        //retrieve visitors and pageviews since the 6 months ago
       
        // $request->header('g_view_id');
        

        return $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));


    }
    

   public function fetchTopReferrers(){

        $data = Analytics::fetchTopReferrers(Period::months(6));

        return $data;

   }

    // public function fetchMostVisitedPages(Period $period, int $maxResults = 20): Collection

    public function fetchTopBrowsers(){

        $data =  Analytics::fetchTopBrowsers(Period::months(6));

        return $data;
    }

    public function fetchUserTypes(){

        $data = Analytics::fetchUserTypes(Period::months(6));

        return $data;


    }

    public function UserTypes(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:userType'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function PageLoadTime(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:avgPageLoadTime',
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersDeviceCategory(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:deviceCategory'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersCountry(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:country'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersCity(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:city',
                'sort' => '-ga:users'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersLanguage(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:language'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersPlatform(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:dataSource'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersScreenResolution(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:browserSize'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersBrowser(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:browser'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    public function UsersOperatingSystem(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:operatingSystem',
                'sort' => '-ga:users'
                
            ]
        );
        echo json_encode($analyticsData);
    }

    // public function users30days(){

    //     $analyticsData = Analytics::performQuery(
    //         Period::months(1),
    //         'ga:sessions',
    //         [
    //             'metrics' => 'ga:users',  
    //             'dimensions' => 'ga:Day'
    //         ]
    //     );
    //     echo '<pre>';
    //     print_r($analyticsData);
    // }

    
    // Mobile Traffic
    public function mobiletraffic(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions'=> 'ga:mobileDeviceInfo, ga:source',
                'metrics' => 'ga:sessions, ga:pageviews, ga:sessionDuration',
                'segment' => 'gaid::-14'
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Revenue Generating Campaigns
    public function RevGenCampaign(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions'=> 'ga:source, ga:medium',
                'metrics' => 'ga:sessions, ga:pageviews, ga:sessionDuration, ga:bounces',
                'segment' => 'dynamic::ga:transactions>1'
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

        // Users new or visitors
        public function usersDate(){

            $analyticsData = Analytics::performQuery(
                Period::months(6),
                'ga:sessions',
                [
                    'metrics'=> 'ga:users',
                    'dimensions' => 'ga:yearMonth'
                ]
            );

            echo json_encode($analyticsData);
            // echo '<pre>';
            // print_r($analyticsData);
        }

        public function newUsersDate(){

            $analyticsData = Analytics::performQuery(
                Period::months(6),
                'ga:sessions',
                [
                    'metrics'=> 'ga:newUsers',
                    'dimensions' => 'ga:yearMonth'
                ]
            );
            echo json_encode($analyticsData);
            // echo '<pre>';
            // print_r($analyticsData);
        }

    // Users new or visitors
    public function usersMinute(){

        $analyticsData = Analytics::performQuery(
            Period::days(0),
            'ga:sessions',
            [
                'metrics'=> 'ga:users',
                'dimensions' => 'ga:minute'
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    public function channelGroupingNewUsers(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:newUsers',
                'dimensions' => 'ga:channelGrouping'
            ]
        );
        echo json_encode($analyticsData);
    }

    public function channelGroupingSessions(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:channelGrouping'
            ]
        );
        echo json_encode($analyticsData);
    }

    // country
    public function country(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions'=> 'ga:country',
                'metrics' => 'ga:sessions',
                'sort' => '-ga:sessions'              
            ]
        );
        echo json_encode($analyticsData);
    }

    // Browser and Operating System
    public function BrowOpSystem(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions'=> 'ga:operatingSystem,ga:operatingSystemVersion,ga:browser,ga:browserVersion',
                'metrics' => 'ga:sessions'            
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // All Traffic Sources - Usage
    public function AllTrafficSourcesU(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source,ga:medium',
                'metrics' => 'ga:sessions,ga:pageviews,ga:sessionDuration,ga:exits',
                'sort' => 'ga:sessions'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // All Traffic Sources - Goals
    public function AllTrafficSourcesG(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source,ga:medium',
                'metrics' => 'ga:sessions,ga:goal1Starts,ga:goal1Completions,ga:goal1Value,ga:goalStartsAll,ga:goalCompletionsAll,ga:goalValueAll',
                'sort' => '-ga:goalCompletionsAll'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

      // All Traffic Sources - E-Commerce
      public function AllTrafficSourcesE(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source,ga:medium',
                'metrics' => 'ga:sessions,ga:transactionRevenue,ga:transactions,ga:uniquePurchases',
                'sort' => '-ga:sessions'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Referring Sites
    public function RefferingSite(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source',
                'metrics' => 'ga:pageviews,ga:sessionDuration,ga:exits',
                'filters' => 'ga:medium==referral',
                'sort' => '-ga:pageviews'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Search Engines
    public function SearchEngine(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source',
                'metrics' => 'ga:pageviews,ga:sessionDuration,ga:exits',
                'filters' => 'ga:medium==cpa,ga:medium==cpc,ga:medium==cpm,ga:medium==cpp,ga:medium==cpv,ga:medium==organic,ga:medium==ppc',
                'sort' => '-ga:pageviews'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Search Engines - Organic Search
    public function SearchEngineOrganic(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source',
                'metrics' => 'ga:pageviews,ga:sessionDuration,ga:exits',
                'filters' => 'ga:medium==organic',
                'sort' => '-ga:pageviews'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Search Engines - Paid Search
    public function SearchEnginePaid(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:source',
                'metrics' => 'ga:pageviews,ga:sessionDuration,ga:exits',
                'filters' => 'ga:medium==cpa,ga:medium==cpc,ga:medium==cpm,ga:medium==cpp,ga:medium==cpv,ga:medium==ppc',
                'sort' => '-ga:pageviews'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Keyword
    public function Keyword(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:keyword',
                'metrics' => 'ga:sessions',
                'sort' => '-ga:sessions'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Content
    public function Content(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:pagePath',
                'metrics' => 'ga:pageviews,ga:uniquePageviews,ga:timeOnPage,ga:bounces,ga:entrances,ga:exits',
                'sort' => '-ga:pageviews'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Landing Page
    public function LandingPage(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:landingPagePath',
                'metrics' => 'ga:entrances,ga:bounces',
                'sort' => '-ga:entrances'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Top Exit Pages
    public function ExitPages(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:exitPagePath',
                'metrics' => 'ga:exits,ga:pageviews',
                'sort' => '-ga:exits'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    // Site Search - Search Terms 
    public function SearchKeyword(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:searchKeyword',
                'metrics' => 'ga:searchUniques',
                'sort' => '-ga:searchUniques'           
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
    }

    public function TimeOnSite(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions,ga:sessionDuration'            
            ]
        );
        // echo '<pre>';
        echo json_encode($analyticsData);
    }

    public function queryCoreReportingApi() {
        $optParams = array(
            'dimensions' => 'ga:source,ga:keyword',
            'sort' => '-ga:sessions,ga:source',
            'filters' => 'ga:medium==organic',
            'max-results' => '25');
      
        return $service->data_ga->get(
            TABLE_ID,
            '2010-01-01',
            '2010-01-15',
            'ga:sessions',
            $optParams);
      }

      public function service(){


        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );
        echo '<pre>';
        print_r($analyticsData);

      }

      public function event(){

        $analyticsData = Analytics::performQuery(
            Period::years(1),
          'ga:sessions',  
            [
                'metrics' => 'ga:sessionsWithEvent'
                
            ]
        );
        echo '<pre>';
        print_r($analyticsData);
      }

}
