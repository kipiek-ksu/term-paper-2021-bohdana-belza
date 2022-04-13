const n = 25;
type TBin = record
     A:array[1..n] of byte;
     number:0..n;
end;
var
   x:longint;
   y:TBin;
        Procedure DecToBin(x:longint; var z:TBin);
        begin
             z.number:=0;
             repeat
                   z.number:=z.number+1;
                   z.A[z.number]:=x mod 2;
                   x:=x div 2;
             until x=0;
        end;
        Procedure OutBin(z:TBin);
        var
           i:integer;
        begin
             for i:=z.number downto 1 do
                 write(z.A[i])
        end;
begin
     read(x);
     DecToBin(x,y);
     OutBin(y)
end.