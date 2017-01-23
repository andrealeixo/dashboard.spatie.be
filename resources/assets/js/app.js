import './helpers/vue-filters';
import CurrentTime from './components/current-time';
import GithubFile from './components/github-file';
import StoreData from './components/storedata';
import TrelloData from './components/trellodata';
import GoogleCalendar from './components/google-calendar';
import InternetConnection from './components/internet-connection';
import LastFm from './components/last-fm';
import TitleBoard from './components/titleboard';
import PosData from './components/posdata';
import moment from 'moment';
import PackagistStatistics from './components/packagist-statistics';
import RainForecast from './components/rain-forecast';
import Vue from 'vue';

moment.locale('en', {
    calendar: {
        lastDay: '[Yesterday]',
        sameDay: '[Today]',
        nextDay: '[Tomorrow]',
        lastWeek: '[last] dddd',
        nextWeek: 'dddd',
        sameElse: 'L',
    },
});

new Vue({

    el: 'body',

    components: {
        CurrentTime,
        GithubFile,
        GoogleCalendar,
        InternetConnection,
        LastFm,
        PackagistStatistics,
        RainForecast,
	StoreData,
	TrelloData,
	TitleBoard,
	PosData
    },

});


