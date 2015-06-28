/* global FontFaceObserver */
'use strict';

require('fontfaceobserver');
var webfontloader = require('webfontloader');

module.exports = function() {
  // Font Loader

  webfontloader.load({
    typekit: {id:'idx2gzm'}
  });

  // Font Observer
  var geogrotesque300 = new FontFaceObserver('geogrotesque', {weight:300});
  var geogrotesque400 = new FontFaceObserver('geogrotesque', {weight:400});
  var geogrotesque600 = new FontFaceObserver('geogrotesque', {weight:600});
  var exposerifpro400 = new FontFaceObserver('expo-serif-pro', {weight:400});

  Promise.all([
    geogrotesque300.check(),
    geogrotesque400.check(),
    geogrotesque600.check()
  ]).then(function() {
    window.document.documentElement.className += ' type__heading--available';
    console.log('Heading fonts loaded');
  }, function() {
    window.document.documentElement.className += ' type__heading--unavailable';
    console.log('Heading fonts unavailable');
  });

  Promise.all([
    exposerifpro400.check()
  ]).then(function() {
    window.document.documentElement.className += ' type__body--available';
    console.log('Body fonts loaded');
  }, function() {
    window.document.documentElement.className += ' type__body--unavailable';
    console.log('Body fonts unavailable');
  });
};
