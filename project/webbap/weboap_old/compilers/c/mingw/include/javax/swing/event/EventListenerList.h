// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_swing_event_EventListenerList__
#define __javax_swing_event_EventListenerList__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

extern "Java"
{
  namespace javax
  {
    namespace swing
    {
      namespace event
      {
        class EventListenerList;
      }
    }
  }
}

class javax::swing::event::EventListenerList : public ::java::lang::Object
{
public:
  EventListenerList ();
  virtual void add (::java::lang::Class *, ::java::util::EventListener *);
  virtual jint getListenerCount ();
  virtual jint getListenerCount (::java::lang::Class *);
  virtual JArray< ::java::lang::Object *> *getListenerList () { return listenerList; }
  virtual JArray< ::java::util::EventListener *> *getListeners (::java::lang::Class *);
  virtual void remove (::java::lang::Class *, ::java::util::EventListener *);
  virtual ::java::lang::String *toString ();
public: // actually package-private
  static const jlong serialVersionUID = -5677132037850737084LL;
private:
  static JArray< ::java::lang::Object *> *NO_LISTENERS;
public:  // actually protected
  JArray< ::java::lang::Object *> * __attribute__((aligned(__alignof__( ::java::lang::Object )))) listenerList;
public:

  static ::java::lang::Class class$;
};

#endif /* __javax_swing_event_EventListenerList__ */