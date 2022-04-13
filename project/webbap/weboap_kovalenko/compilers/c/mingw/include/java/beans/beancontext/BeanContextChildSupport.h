// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_beans_beancontext_BeanContextChildSupport__
#define __java_beans_beancontext_BeanContextChildSupport__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace beans
    {
      class VetoableChangeListener;
      class PropertyChangeListener;
      class VetoableChangeSupport;
      class PropertyChangeSupport;
      namespace beancontext
      {
        class BeanContextChildSupport;
        class BeanContextServiceAvailableEvent;
        class BeanContextServiceRevokedEvent;
        class BeanContext;
        class BeanContextChild;
      }
    }
  }
}

class java::beans::beancontext::BeanContextChildSupport : public ::java::lang::Object
{
public:
  BeanContextChildSupport ();
  BeanContextChildSupport (::java::beans::beancontext::BeanContextChild *);
  virtual void setBeanContext (::java::beans::beancontext::BeanContext *);
  virtual ::java::beans::beancontext::BeanContext *getBeanContext () { return beanContext; }
  virtual ::java::beans::beancontext::BeanContextChild *getBeanContextChildPeer () { return beanContextChildPeer; }
  virtual jboolean isDelegated ();
  virtual void addPropertyChangeListener (::java::lang::String *, ::java::beans::PropertyChangeListener *);
  virtual void removePropertyChangeListener (::java::lang::String *, ::java::beans::PropertyChangeListener *);
  virtual void addVetoableChangeListener (::java::lang::String *, ::java::beans::VetoableChangeListener *);
  virtual void removeVetoableChangeListener (::java::lang::String *, ::java::beans::VetoableChangeListener *);
  virtual void firePropertyChange (::java::lang::String *, ::java::lang::Object *, ::java::lang::Object *);
  virtual void fireVetoableChange (::java::lang::String *, ::java::lang::Object *, ::java::lang::Object *);
  virtual void serviceRevoked (::java::beans::beancontext::BeanContextServiceRevokedEvent *) { }
  virtual void serviceAvailable (::java::beans::beancontext::BeanContextServiceAvailableEvent *) { }
  virtual jboolean validatePendingSetBeanContext (::java::beans::beancontext::BeanContext *);
public:  // actually protected
  virtual void releaseBeanContextResources () { }
  virtual void initializeBeanContextResources () { }
public: // actually package-private
  static const jlong serialVersionUID = 6328947014421475877LL;
public:
  ::java::beans::beancontext::BeanContextChild * __attribute__((aligned(__alignof__( ::java::lang::Object )))) beanContextChildPeer;
public:  // actually protected
  ::java::beans::beancontext::BeanContext *beanContext;
  jboolean rejectedSetBCOnce;
  ::java::beans::PropertyChangeSupport *pcSupport;
  ::java::beans::VetoableChangeSupport *vcSupport;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_beans_beancontext_BeanContextChildSupport__ */
