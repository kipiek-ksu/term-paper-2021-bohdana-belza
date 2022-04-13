program z16;
var
   i,j,m:integer;
   mas:array[1..100,1..100] of real;
begin
     readln(m);
     for i:=1 to m do
         for j:=1 to m do
             read(mas[i,j]);
     for I:=1 to m do
         for j:=1 to m do
             if i<=j then mas[i,j]:=0;
      for I:=1 to m do
          begin
               for j:=1 to m do
                   write(mas[i,j]:0:1,);
               writeln;
          end;
     end.
