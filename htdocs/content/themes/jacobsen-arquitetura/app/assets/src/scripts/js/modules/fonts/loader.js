'use strict';

var fontfaceobserver = require('fontfaceobserver');

module.exports = function() {
  var geogrotesque300 = new fontfaceobserver('geogrotesque', {weight:300});
  var geogrotesque400 = new fontfaceobserver('geogrotesque', {weight:400});
  var geogrotesque600 = new fontfaceobserver('geogrotesque', {weight:600});
  var exposerifpro400 = new fontfaceobserver('expo-serif-pro', {weight:400});

  Promise.all(
    geogrotesque300.check(),
    geogrotesque400.check(),
    geogrotesque600.check(),
    exposerifpro400.check()
  ).then(function() {
    window.document.documentElement.className += ' fonts-loaded';
    console.log('Fonts loaded');
  });
};
