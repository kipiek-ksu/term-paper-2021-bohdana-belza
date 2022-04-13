program l6_21 ;
var a:array[1..100,1..100] of integer;
    n,i,j:byte;

Begin
     readln(n);
     for i:=1 to n do
         read(a[1,i]);
     for j:=1 to n do
         for i:=2 to n do
             a[i,j]:=a[i-1,j]*a[1,j];
     for i:=1 to n do
     begin
          for j:=1 to n do
          write(a[i,j],' ');
          writeln;
     end;
End.