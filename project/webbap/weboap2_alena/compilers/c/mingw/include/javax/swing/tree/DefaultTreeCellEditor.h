// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_swing_tree_DefaultTreeCellEditor__
#define __javax_swing_tree_DefaultTreeCellEditor__

#pragma interface

#include <java/lang/Object.h>

extern "Java"
{
  namespace java
  {
    namespace awt
    {
      namespace event
      {
        class ActionEvent;
      }
      class Font;
      class Color;
      class Component;
      class Container;
    }
  }
  namespace javax
  {
    namespace swing
    {
      namespace event
      {
        class TreeSelectionEvent;
        class CellEditorListener;
      }
      class Icon;
      class Timer;
      class JTree;
      namespace tree
      {
        class DefaultTreeCellEditor;
        class TreePath;
        class DefaultTreeCellRenderer;
        class TreeCellEditor;
      }
    }
  }
}

class javax::swing::tree::DefaultTreeCellEditor : public ::java::lang::Object
{
public:
  DefaultTreeCellEditor (::javax::swing::JTree *, ::javax::swing::tree::DefaultTreeCellRenderer *);
  DefaultTreeCellEditor (::javax::swing::JTree *, ::javax::swing::tree::DefaultTreeCellRenderer *, ::javax::swing::tree::TreeCellEditor *);
private:
  void writeObject (::java::io::ObjectOutputStream *) { }
  void readObject (::java::io::ObjectInputStream *) { }
public:
  virtual void setBorderSelectionColor (::java::awt::Color *) { }
  virtual ::java::awt::Color *getBorderSelectionColor () { return 0; }
  virtual void setFont (::java::awt::Font *) { }
  virtual ::java::awt::Font *getFont () { return 0; }
  virtual ::java::awt::Component *getTreeCellEditorComponent (::javax::swing::JTree *, ::java::lang::Object *, jboolean, jboolean, jboolean, jint) { return 0; }
  virtual ::java::lang::Object *getCellEditorValue () { return 0; }
  virtual jboolean isCellEditable (::java::util::EventObject *);
  virtual jboolean shouldSelectCell (::java::util::EventObject *);
  virtual jboolean stopCellEditing ();
  virtual void cancelCellEditing () { }
  virtual void addCellEditorListener (::javax::swing::event::CellEditorListener *) { }
  virtual void removeCellEditorListener (::javax::swing::event::CellEditorListener *) { }
  virtual void valueChanged (::javax::swing::event::TreeSelectionEvent *) { }
  virtual void actionPerformed (::java::awt::event::ActionEvent *) { }
public:  // actually protected
  virtual void setTree (::javax::swing::JTree *) { }
  virtual jboolean shouldStartEditingTimer (::java::util::EventObject *);
  virtual void startEditingTimer () { }
  virtual jboolean canEditImmediately (::java::util::EventObject *);
  virtual jboolean inHitRegion (jint, jint);
  virtual void determineOffset (::javax::swing::JTree *, ::java::lang::Object *, jboolean, jboolean, jboolean, jint) { }
  virtual void prepareForEditing () { }
  virtual ::java::awt::Container *createContainer () { return 0; }
  virtual ::javax::swing::tree::TreeCellEditor *createTreeCellEditor () { return 0; }
  ::javax::swing::tree::TreeCellEditor * __attribute__((aligned(__alignof__( ::java::lang::Object )))) realEditor;
  ::javax::swing::tree::DefaultTreeCellRenderer *renderer;
  ::java::awt::Container *editingContainer;
  ::java::awt::Component *editingComponent;
  jboolean canEdit;
  jint offset;
  ::javax::swing::JTree *tree;
  ::javax::swing::tree::TreePath *lastPath;
  ::javax::swing::Timer *timer;
  jint lastRow;
  ::java::awt::Color *borderSelectionColor;
  ::javax::swing::Icon *editingIcon;
  ::java::awt::Font *font;

  friend class javax_swing_tree_DefaultTreeCellEditor$DefaultTextField;
  friend class javax_swing_tree_DefaultTreeCellEditor$EditorContainer;
public:

  static ::java::lang::Class class$;
};

#endif /* __javax_swing_tree_DefaultTreeCellEditor__ */
