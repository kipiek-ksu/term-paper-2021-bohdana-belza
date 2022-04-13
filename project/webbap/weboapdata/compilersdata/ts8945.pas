program zad6_2;
var
   i,j:integer;
   a:array[1..10]of real;
   b:array[1..20]of reAL;
   c:array[1..20,1..10]of real;
begin
     for i:=1 to 10 do
         read(a[i]);
     for i:=1 to 20 do
         read(b[i]);
     for I:=1 to 20 do
         for j:=1 to 10 do
             c[i,j]:=a[j]/(1+abs(b[i]));
     for I:=1 to 20 do
         begin
              for j:=1 to 10 do
                  write(c[i,j]:0:2,' ');
              writeln;
         end;
end.
         