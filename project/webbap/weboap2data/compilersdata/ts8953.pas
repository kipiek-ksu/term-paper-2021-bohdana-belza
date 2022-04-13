program _6_21;
var
   i,n,k:integer;
   a:array[1..200] of integer;
procedure step(n,k:integer);
         var n1:longint;i:integer;
         begin
           n1:=n;
           i:=1;
           while k<>i do
            begin
             n1:=n1*n;
             i:=i+1;
            end;
            write(n1,' ')

         end;
begin
  readln(n);
  if n>=1 then
   begin
      for i:=1 to n do
         read(a[i]);
      writeln;
      k:=1;
      while k<>(n+1) do
        begin
           for i:=1 to n do
             begin
             step(a[i],k);
             end;
            writeln;

            k:=k+1;
        end;
   end;
end.