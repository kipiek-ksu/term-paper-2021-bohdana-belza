// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_swing_JComboBox__
#define __javax_swing_JComboBox__

#pragma interface

#include <javax/swing/JComponent.h>
#include <gcj/array.h>

extern "Java"
{
  namespace java
  {
    namespace beans
    {
      class PropertyChangeListener;
    }
    namespace awt
    {
      namespace event
      {
        class KeyEvent;
        class ActionEvent;
        class ItemEvent;
        class ActionListener;
        class ItemListener;
      }
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
      class JComboBox;
      namespace event
      {
        class ListDataEvent;
      }
      class Action;
      namespace plaf
      {
        class ComboBoxUI;
      }
      class JComboBox$KeySelectionManager;
      class ComboBoxEditor;
      class ListCellRenderer;
      class ComboBoxModel;
    }
  }
}

class javax::swing::JComboBox : public ::javax::swing::JComponent
{
public:
  JComboBox (::javax::swing::ComboBoxModel *);
  JComboBox (JArray< ::java::lang::Object *> *);
  JComboBox (::java::util::Vector *);
  JComboBox ();
private:
  void writeObject (::java::io::ObjectOutputStream *) { }
public:
  virtual jboolean isEditable ();
public:  // actually protected
  virtual void installAncestorListener () { }
public:
  virtual void setUI (::javax::swing::plaf::ComboBoxUI *);
  virtual void updateUI ();
  virtual ::java::lang::String *getUIClassID ();
  virtual ::javax::swing::plaf::ComboBoxUI *getUI ();
  virtual void setModel (::javax::swing::ComboBoxModel *) { }
  virtual ::javax::swing::ComboBoxModel *getModel () { return 0; }
  virtual void setLightWeightPopupEnabled (jboolean) { }
  virtual jboolean isLightWeightPopupEnabled ();
  virtual void setEditable (jboolean) { }
  virtual void setMaximumRowCount (jint) { }
  virtual jint getMaximumRowCount ();
  virtual void setRenderer (::javax::swing::ListCellRenderer *) { }
  virtual ::javax::swing::ListCellRenderer *getRenderer () { return 0; }
  virtual void setEditor (::javax::swing::ComboBoxEditor *) { }
  virtual ::javax::swing::ComboBoxEditor *getEditor () { return 0; }
  virtual void setSelectedItem (::java::lang::Object *) { }
  virtual ::java::lang::Object *getSelectedItem () { return 0; }
  virtual void setSelectedIndex (jint) { }
  virtual jint getSelectedIndex ();
  virtual void addItem (::java::lang::Object *) { }
  virtual void insertItemAt (::java::lang::Object *, jint) { }
  virtual void removeItem (::java::lang::Object *) { }
  virtual void removeItemAt (jint) { }
  virtual void removeAllItems () { }
  virtual void showPopup () { }
  virtual void hidePopup () { }
  virtual void setPopupVisible (jboolean) { }
  virtual jboolean isPopupVisible ();
  virtual void addItemListener (::java::awt::event::ItemListener *) { }
  virtual void removeItemListener (::java::awt::event::ItemListener *) { }
  virtual void addActionListener (::java::awt::event::ActionListener *) { }
  virtual void removeActionListener (::java::awt::event::ActionListener *) { }
  virtual void setActionCommand (::java::lang::String *) { }
  virtual ::java::lang::String *getActionCommand () { return 0; }
  virtual void setAction (::javax::swing::Action *) { }
private:
  jboolean isListener (::java::lang::Class *, ::java::awt::event::ActionListener *);
public:
  virtual ::javax::swing::Action *getAction () { return 0; }
public:  // actually protected
  virtual void configurePropertiesFromAction (::javax::swing::Action *) { }
  virtual ::java::beans::PropertyChangeListener *createActionPropertyChangeListener (::javax::swing::Action *) { return 0; }
  virtual void fireItemStateChanged (::java::awt::event::ItemEvent *) { }
  virtual void fireActionEvent () { }
  virtual void selectedItemChanged () { }
public:
  virtual JArray< ::java::lang::Object *> *getSelectedObjects () { return 0; }
  virtual void actionPerformed (::java::awt::event::ActionEvent *) { }
  virtual void contentsChanged (::javax::swing::event::ListDataEvent *) { }
  virtual jboolean selectWithKeyChar (jchar);
  virtual void intervalAdded (::javax::swing::event::ListDataEvent *) { }
  virtual void intervalRemoved (::javax::swing::event::ListDataEvent *) { }
  virtual void setEnabled (jboolean) { }
  virtual void configureEditor (::javax::swing::ComboBoxEditor *, ::java::lang::Object *) { }
  virtual void processKeyEvent (::java::awt::event::KeyEvent *) { }
  virtual jboolean isFocusTraversable ();
  virtual void setKeySelectionManager (::javax::swing::JComboBox$KeySelectionManager *) { }
  virtual ::javax::swing::JComboBox$KeySelectionManager *getKeySelectionManager () { return 0; }
  virtual jint getItemCount ();
  virtual ::java::lang::Object *getItemAt (jint) { return 0; }
public:  // actually protected
  virtual ::javax::swing::JComboBox$KeySelectionManager *createDefaultKeySelectionManager () { return 0; }
  virtual ::java::lang::String *paramString () { return 0; }
public:
  virtual ::javax::accessibility::AccessibleContext *getAccessibleContext ();
private:
  static const jlong serialVersionUID = 5654585963292734470LL;
  static ::java::lang::String *uiClassID;
public:  // actually protected
  ::javax::swing::ComboBoxModel * __attribute__((aligned(__alignof__( ::javax::swing::JComponent )))) dataModel;
  ::javax::swing::ListCellRenderer *renderer;
  ::javax::swing::ComboBoxEditor *editor;
  jint maximumRowCount;
  jboolean isEditable__;
  ::java::lang::Object *selectedItemReminder;
  ::javax::swing::JComboBox$KeySelectionManager *keySelectionManager;
  ::java::lang::String *actionCommand;
  jboolean lightWeightPopupEnabled;

  friend class javax_swing_JComboBox$KeySelectionManager;
  friend class javax_swing_JComboBox$AccessibleJComboBox;
public:

  static ::java::lang::Class class$;
};

#endif /* __javax_swing_JComboBox__ */
