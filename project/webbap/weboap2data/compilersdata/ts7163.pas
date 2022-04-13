Program L_1_3;
Var abc,ab,a,b,c,R:integer;
Begin
Read(abc);
a:=abc div 100;
c:=abc mod 10;
ab:=abc div 10;
b:=ab mod 10;
R:=sqr(a)+sqr(b)+sqr(c);
Write(R);
end.