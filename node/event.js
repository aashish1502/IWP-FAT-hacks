var events = require('events');
var eventEmitter = new events.EventEmitter();

var myEventHandler = () =>{
  
    console.log("i hear a screeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeam!");

}

eventEmitter.on('scream', myEventHandler);
eventEmitter.emit('scream');