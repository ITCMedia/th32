import bind from './event/bind';
import unbind from './event/unbind';
import unbindAll from './event/unbind-all';
import bindOnce from './event/bind-once';
import EventEmitter from './event/event-emitter';
import BaseEvent from './event/base-event';
import ready from './event/ready';

export default class Event
{
	static bind = bind;
	static bindOnce = bindOnce;
	static unbind = unbind;
	static unbindAll = unbindAll;
	static EventEmitter = EventEmitter;
	static BaseEvent = BaseEvent;
	static ready = ready;
}