// DO NOT EDIT THIS FILE - it is machine generated -*- c++ -*-

#ifndef __java_awt_Font__
#define __java_awt_Font__

#pragma interface

#include <java/lang/Object.h>
#include <gcj/array.h>

extern "Java"
{
  namespace java
  {
    namespace text
    {
      class AttributedCharacterIterator$Attribute;
      class CharacterIterator;
    }
    namespace awt
    {
      namespace peer
      {
        class FontPeer;
      }
      namespace geom
      {
        class Rectangle2D;
        class AffineTransform;
      }
      namespace font
      {
        class LineMetrics;
        class GlyphVector;
        class FontRenderContext;
      }
      class Font;
    }
  }
  namespace gnu
  {
    namespace java
    {
      namespace awt
      {
        class ClasspathToolkit;
        namespace peer
        {
          class ClasspathFontPeer;
        }
      }
    }
  }
}

class java::awt::Font : public ::java::lang::Object
{
public:
  static ::java::awt::Font *decode (::java::lang::String *);
public:  // actually protected
  static ::gnu::java::awt::ClasspathToolkit *tk ();
  static ::java::util::Map *attrsToMap (jint, jint);
  static ::java::awt::Font *getFontFromToolkit (::java::lang::String *, ::java::util::Map *);
  static ::gnu::java::awt::peer::ClasspathFontPeer *getPeerFromToolkit (::java::lang::String *, ::java::util::Map *);
public:
  static ::java::awt::Font *getFont (::java::lang::String *, ::java::awt::Font *);
  static ::java::awt::Font *getFont (::java::lang::String *);
  Font (::java::lang::String *, jint, jint);
  Font (::java::util::Map *);
  Font (::java::lang::String *, ::java::util::Map *);
  virtual ::java::lang::String *getName ();
  virtual jint getSize ();
  virtual jfloat getSize2D ();
  virtual jboolean isPlain ();
  virtual jboolean isBold ();
  virtual jboolean isItalic ();
  virtual ::java::lang::String *getFamily ();
  virtual jint getStyle ();
  virtual jboolean canDisplay (jchar);
  virtual jint canDisplayUpTo (::java::lang::String *);
  virtual jint canDisplayUpTo (jcharArray, jint, jint);
  virtual jint canDisplayUpTo (::java::text::CharacterIterator *, jint, jint);
  static ::java::awt::Font *createFont (jint, ::java::io::InputStream *);
  virtual ::java::awt::font::GlyphVector *createGlyphVector (::java::awt::font::FontRenderContext *, ::java::lang::String *);
  virtual ::java::awt::font::GlyphVector *createGlyphVector (::java::awt::font::FontRenderContext *, ::java::text::CharacterIterator *);
  virtual ::java::awt::font::GlyphVector *createGlyphVector (::java::awt::font::FontRenderContext *, jcharArray);
  virtual ::java::awt::font::GlyphVector *createGlyphVector (::java::awt::font::FontRenderContext *, jintArray);
  virtual ::java::awt::Font *deriveFont (jfloat);
  virtual ::java::awt::Font *deriveFont (jint);
  virtual ::java::awt::Font *deriveFont (jint, ::java::awt::geom::AffineTransform *);
  virtual ::java::awt::Font *deriveFont (::java::util::Map *);
  virtual ::java::util::Map *getAttributes ();
  virtual JArray< ::java::text::AttributedCharacterIterator$Attribute *> *getAvailableAttributes ();
  virtual jbyte getBaselineFor (jchar);
  virtual ::java::lang::String *getFamily (::java::util::Locale *);
  static ::java::awt::Font *getFont (::java::util::Map *);
  virtual ::java::lang::String *getFontName ();
  virtual ::java::lang::String *getFontName (::java::util::Locale *);
  virtual jfloat getItalicAngle ();
  virtual ::java::awt::font::LineMetrics *getLineMetrics (::java::lang::String *, jint, jint, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::font::LineMetrics *getLineMetrics (jcharArray, jint, jint, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::font::LineMetrics *getLineMetrics (::java::text::CharacterIterator *, jint, jint, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::geom::Rectangle2D *getMaxCharBounds (::java::awt::font::FontRenderContext *);
  virtual jint getMissingGlyphCode ();
  virtual jint getNumGlyphs ();
  virtual ::java::lang::String *getPSName ();
  virtual ::java::awt::geom::Rectangle2D *getStringBounds (::java::lang::String *, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::geom::Rectangle2D *getStringBounds (::java::lang::String *, jint, jint, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::geom::Rectangle2D *getStringBounds (::java::text::CharacterIterator *, jint, jint, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::geom::Rectangle2D *getStringBounds (jcharArray, jint, jint, ::java::awt::font::FontRenderContext *);
  virtual ::java::awt::geom::AffineTransform *getTransform ();
  virtual jboolean hasUniformLineMetrics ();
  virtual jboolean isTransformed ();
  virtual ::java::awt::font::GlyphVector *layoutGlyphVector (::java::awt::font::FontRenderContext *, jcharArray, jint, jint, jint);
  virtual ::java::awt::peer::FontPeer *getPeer () { return reinterpret_cast< ::java::awt::peer::FontPeer *> (peer); }
  virtual jint hashCode ();
  virtual jboolean equals (::java::lang::Object *);
  virtual ::java::lang::String *toString ();
  virtual ::java::awt::font::LineMetrics *getLineMetrics (::java::lang::String *, ::java::awt::font::FontRenderContext *);
  static const jint PLAIN = 0L;
  static const jint BOLD = 1L;
  static const jint ITALIC = 2L;
  static const jint ROMAN_BASELINE = 0L;
  static const jint CENTER_BASELINE = 1L;
  static const jint HANGING_BASELINE = 2L;
  static const jint TRUETYPE_FONT = 0L;
  static const jint LAYOUT_LEFT_TO_RIGHT = 0L;
  static const jint LAYOUT_RIGHT_TO_LEFT = 1L;
  static const jint LAYOUT_NO_START_CONTEXT = 2L;
  static const jint LAYOUT_NO_LIMIT_CONTEXT = 4L;
private:
  static const jlong serialVersionUID = -4206021311591459213LL;
  ::gnu::java::awt::peer::ClasspathFontPeer * __attribute__((aligned(__alignof__( ::java::lang::Object )))) peer;
public:

  static ::java::lang::Class class$;
};

#endif /* __java_awt_Font__ */
