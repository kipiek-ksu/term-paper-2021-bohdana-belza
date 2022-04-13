rogram zad6_7;
var
   n,i,j:integer;
   A:array[1..255,1..7]of real;
begin
     readln(n);
     for i:=1 to n do
         for j:=1 to 7 do
             if i=1 then a[i,j]:=2*j+3
                else if i=2 then a[i,j]:=j-3/(2+1/j)
                     else a[i,j]:=a[i-1,j]+a[i-2,j];
     for i:=1 to n do
         begin
              for j:=1 to 7 do
                  write(a[i,j]:6:1);
                     end;
end.