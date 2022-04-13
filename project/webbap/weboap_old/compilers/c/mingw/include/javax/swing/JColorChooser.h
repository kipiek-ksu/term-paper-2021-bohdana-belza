// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_swing_JColorChooser__
#define __javax_swing_JColorChooser__

#pragma interface

#include <javax/swing/JComponent.h>
#include <gcj/array.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace event
      {
        class ActionListener;
      }
      class Component;
      class Color;
    }
  }
  namespace javax
  {
    namespace accessibility
    {
      class AccessibleContext;
    }
    namespace swing
    {
      namespace plaf
      {
        class ColorChooserUI;
      }
      class JDialog;
      class JColorChooser;
      class JComponent;
      namespace colorchooser
      {
        class AbstractColorChooserPanel;
        class ColorSelectionModel;
      }
    }
  }
}

class javax::swing::JColorChooser : public ::javax::swing::JComponent
{
public:
  JColorChooser ();
  JColorChooser (::java::awt::Color *);
  JColorChooser (::javax::swing::colorchooser::ColorSelectionModel *);
private:
  void writeObject (::java::io::ObjectOutputStream *) { }
public:
  virtual void setColor (::java::awt::Color *) { }
  virtual void setColor (jint, jint, jint) { }
  virtual void setColor (jint) { }
  static ::java::awt::Color *showDialog (::java::awt::Component *, ::java::lang::String *, ::java::awt::Color *) { return 0; }
  static ::javax::swing::JDialog *createDialog (::java::awt::Component *, ::java::lang::String *, jboolean, ::javax::swing::JColorChooser *, ::java::awt::event::ActionListener *, ::java::awt::event::ActionListener *) { return 0; }
  virtual ::javax::swing::plaf::ColorChooserUI *getUI ();
  virtual void setUI (::javax::swing::plaf::ColorChooserUI *);
  virtual void updateUI ();
  virtual ::java::lang::String *getUIClassID ();
  virtual ::java::awt::Color *getColor () { return 0; }
  virtual void setPreviewPanel (::javax::swing::JComponent *) { }
  virtual ::javax::swing::JComponent *getPreviewPanel () { return 0; }
  virtual void addChooserPanel (::javax::swing::colorchooser::AbstractColorChooserPanel *) { }
  virtual ::javax::swing::colorchooser::AbstractColorChooserPanel *removeChooserPanel (::javax::swing::colorchooser::AbstractColorChooserPanel *) { return 0; }
  virtual void setChooserPanels (JArray< ::javax::swing::colorchooser::AbstractColorChooserPanel *> *) { }
  virtual JArray< ::javax::swing::colorchooser::AbstractColorChooserPanel *> *getChooserPanels () { return 0; }
  virtual ::javax::swing::colorchooser::ColorSelectionModel *getSelectionModel () { return 0; }
  virtual void setSelectionModel (::javax::swing::colorchooser::ColorSelectionModel *) { }
public:  // actually protected
  virtual ::java::lang::String *paramString () { return 0; }
public:
  virtual ::javax::accessibility::AccessibleContext *getAccessibleContext ();
private:
  static ::java::lang::String *uiClassID;
  ::javax::swing::colorchooser::ColorSelectionModel * __attribute__((aligned(__alignof__( ::javax::swing::JComponent )))) selectionModel;
  ::javax::swing::JComponent *previewPanel;
  JArray< ::javax::swing::colorchooser::AbstractColorChooserPanel *> *chooserPanels;
public:
  static ::java::lang::String *SELECTION_MODEL_PROPERTY;
  static ::java::lang::String *PREVIEW_PANEL_PROPERTY;
  static ::java::lang::String *CHOOSER_PANELS_PROPERTY;
public:  // actually protected
  ::javax::accessibility::AccessibleContext *accessibleContext;

  friend class javax_swing_JColorChooser$AccessibleJColorChooser;
public:

  static ::java::lang::Class class$;
};

#endif /* __javax_swing_JColorChooser__ */