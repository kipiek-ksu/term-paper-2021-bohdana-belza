// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __javax_print_attribute_standard_DateTimeAtProcessing__
#define __javax_print_attribute_standard_DateTimeAtProcessing__

#pragma interface

#include <javax/print/attribute/DateTimeSyntax.h>

extern "Java"
{
  namespace javax
  {
    namespace print
    {
      namespace attribute
      {
        namespace standard
        {
          class DateTimeAtProcessing;
        }
      }
    }
  }
}

class javax::print::attribute::standard::DateTimeAtProcessing : public ::javax::print::attribute::DateTimeSyntax
{
public:
  DateTimeAtProcessing (::java::util::Date *);
  jboolean equals (::java::lang::Object *);
  ::java::lang::Class *getCategory ();
  ::java::lang::String *getName ();
private:
  static const jlong serialVersionUID = -3710068197278263244LL;
public:

  static ::java::lang::Class class$;
};

#endif /* __javax_print_attribute_standard_DateTimeAtProcessing__ */