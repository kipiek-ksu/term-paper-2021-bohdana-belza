rogram R3Z3;

Var a,b:real;

Procedure ProcObmen(var a,b:real);
var buffer:real;

Begin
     buffer:=a;
     a:=b;
     b:=buffer;
End;

BEGIN
     read(a,b);
     ProcObmen(a,b);
     write(a:0:2,' ',b:0:2);
END.